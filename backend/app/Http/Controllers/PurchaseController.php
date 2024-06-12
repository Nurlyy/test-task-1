<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Purchase;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class PurchaseController extends Controller
{
    public function save(Request $request)
    {
        try {
            $rules = [
                'shop' => 'required|string|unique:shops,name,' . ($request->id ?? 'NULL'),
                'amount' => 'required|numeric',
                'currency' => 'required|string|in:usd,eur,rub',
                'date' => 'required|date_format:Y-m-d',
            ];

            if (!$request->id) {
                $rules['document'] = 'required|file|mimes:pdf,jpg';
            } else {
                $rules['document'] = 'nullable|file|mimes:pdf,jpg';
            }

            $request->validate($rules);

            if ($request->currency != 'usd') {
                $currencyRate = Currency::where("name", $request->currency)->first()->amount_per_usd;
                $currencyInUsd = $request->amount / $currencyRate;
            } else {
                $currencyInUsd = $request->amount;
            }

            $shop = Shop::firstOrCreate(['name' => $request->shop]);

            if ($request->id) {
                $purchase = Purchase::findOrFail($request->id);
                if ($request->hasFile('document')) {
                    Storage::delete($purchase->document);
                    $file = $request->file('document');
                    $path = $file->store('documents');
                    $purchase->document = $path;
                }
            } else {
                $purchase = new Purchase();
                $file = $request->file('document');
                $path = $file->store('documents');
                $purchase->document = $path;
            }

            $purchase->shop_id = $shop->id;
            $purchase->amount = $currencyInUsd;
            $purchase->purchase_date = $request->date;

            $purchase->save();

            return response()->json(['status' => 'success', 'purchase' => $purchase], 200);

        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => 'Ошибка валидации данных', 'errors' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => 'error', 'message' => 'Покупка не найдена'], 404);
        } catch (Exception $e) {
            if (isset($path) && isset($file)) {
                Storage::delete($path); 
            }
            return response()->json(['status' => 'error', 'message' => 'Неизвестная ошибка. Попробуйте еще раз', 'error' => $e->getMessage()], 500);
        }
    }

}
