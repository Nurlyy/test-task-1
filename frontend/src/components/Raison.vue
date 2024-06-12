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
                        <th scope="row" class="px-6 py-4 font-medium text-blue-500 whitespace-nowrap  underline ">
                            <a class="cursor-pointer">Amazon</a>
                        </th>
                        <td class="px-6 py-4">
                            01.06.2024
                        </td>
                        <td class="px-6 py-4">
                            201.34 USD
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-blue-500 whitespace-nowrap  underline ">
                            <a class=" cursor-pointer">document.pdf</a>
                        </td>
                        <td class="px-6 py-4 text-right flex flex-row">
                            <div class="bg-white p-2 rounded cursor-pointer hover:bg-gray-200 transition-all">
                                <img class="w-4" src="@/assets/edit.png" alt="">
                            </div>
                            <div class="ml-2 bg-white p-2 rounded cursor-pointer hover:bg-gray-200 transition-all">
                                <img class="w-4" src="@/assets/delete.png" alt="">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-8">
                <button class="px-4 py-2 rounded bg-blue-500 hover:bg-blue-700 transition-all text-white">
                    + Добавить
                </button>
            </div>
        </div>

        <div id="edit-modal" tabindex="-1" aria-hidden="true"
            class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex bg-black bg-opacity-25 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Добавить элемент
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Закрыть</span>
                        </button>
                    </div>
                    <div class="p-4 md:p-5">
                        <form class="space-y-8">
                            <div>
                                <label for="shop"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название
                                    магазина</label>
                                <input type="text" name="shop" id="shop"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Amazon" required />
                            </div>
                            <div>
                                <label for="total"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Сумма USD</label>
                                <input type="text" name="total" id="total" placeholder="0.0 USD"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Документ (PDF, JPG)</label>
                                <input
                                    class="w-full text-sm p-2.5 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    id="file_input" type="file">
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Raison"
}
</script>

<style></style>