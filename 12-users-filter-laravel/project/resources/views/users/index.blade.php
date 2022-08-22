
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Live search</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="min-h-screen bg-gray-100">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
                <h2 class="font-bold text-2xl">Live Search</h2>
            </div>
        </div>
    </header>

    <main>
        <div x-data="{
                search: '',
                users: {{ $users }},
                filteredUsers() {
                    return this.users.filter((user) => {
                        let query = this.search.toLowerCase();
                        return user.name.toLowerCase().includes(query) || user.email.toLowerCase().includes(query)
                    });
                }
            }"
            class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex relative flex-wrap flex-1 items-stretch">
                    <input type="text"
                           x-model="search"
                           placeholder="Search here..."
                           class="relative px-3 py-3 w-full text-sm bg-white rounded border-0 shadow outline-none placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"/>
                </div>

                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left"></th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <template x-for="user, index in filteredUsers">
                        <tr class="bg-white">
                            <td x-text="index + 1" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"></td>
                            <td x-text="user.name" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"></td>
                            <td x-text="user.email" class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"></td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>
