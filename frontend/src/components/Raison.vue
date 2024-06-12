<template>
    <div class="w-screen h-screen flex justify-center items-center">


        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-row justify-between items-center">
                <input type="text" id="first_name"
                    class="bg-gray-50 w-40 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Поиск" required />
                <div class="grid grid-cols-4 gap-2">
                    <button class="bg-blue-500 transition-all text-white px-4 py-2 rounded hover:bg-blue-700">
                        all
                    </button>
                    <button class="bg-blue-500 transition-all text-white px-4 py-2 rounded hover:bg-blue-700">
                        EUR
                    </button>
                    <button class="bg-blue-500 transition-all text-white px-4 py-2 rounded hover:bg-blue-700">
                        USD
                    </button>
                    <button class="bg-blue-500 transition-all text-white px-4 py-2 rounded hover:bg-blue-700">
                        RUB
                    </button>
                </div>
            </div>
            <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Магазин
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Дата
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Сумма
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Документ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Действие</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Raison"
}
</script>

<style></style>