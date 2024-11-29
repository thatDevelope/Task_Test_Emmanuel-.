<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <!-- Notification Bell Icon -->
        <div class="relative inline-block">
            <button id="notification-bell" class="text-gray-500 focus:outline-none">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V5a1 1 0 10-2 0v.083A6 6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span id="notification-count" class="absolute top-0 right-0 bg-red-600 text-white text-xs font-bold rounded-full px-1 hidden">
                    0
                </span>
            </button>
            <!-- Notifications Dropdown -->
            <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
            <ul id="notification-list" class="divide-y divide-gray-200">
            @foreach(auth()->user()->unreadNotifications as $notification)
                <li class="p-4 text-gray-600">
                {{ $notification->data['messages'] ?? 'No message available' }}<!-- Adjust based on your notification structure -->
                </li>
            @endforeach
        </ul>
            </div>
        </div>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-gray-200 h-screen">
            <div class="p-4">
                <h3 class="text-lg font-bold">Menu</h3>
            </div>
            <ul>
                <li class="p-4 hover:bg-gray-700 cursor-pointer">
                    <a href="#">Dashboard</a>
                </li>
                <li class="p-4 hover:bg-gray-700 cursor-pointer">
                    <button id="toggle-form" class="w-full text-left">Create BRT</button>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 py-12 px-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>

                <!-- Hidden Form -->
                <div id="create-brt-form" class="hidden mt-8">
                    <form method="POST" action="/brts" class="bg-white p-6 shadow rounded">
                        @csrf

                        <!-- User ID -->
                        <div class="mb-4">
    <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
    <input 
        type="number" 
        name="user_id" 
        id="user_id" 
        value="{{ auth()->id() }}" 
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
        required 
        readonly
    >
</div>


                        <!-- Reserved Amount -->
                        <div class="mb-4">
                            <label for="reserved_amount" class="block text-sm font-medium text-gray-700">Reserved Amount</label>
                            <input type="number" step="0.01" name="reserved_amount" id="reserved_amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Expiry Date -->
                        <div class="mb-4">
                            <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700" style="color:blue;">
                                Create BRT
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const notificationBell = document.getElementById("notification-bell");
    const notificationDropdown = document.getElementById("notification-dropdown");
    const notificationList = document.getElementById("notification-list");
    const notificationCount = document.getElementById("notification-count");
    const noNotificationsItem = document.getElementById("no-notifications");

    let notifications = [];

    // Toggle dropdown visibility
    notificationBell.addEventListener("click", () => {
        notificationDropdown.classList.toggle("hidden");
    });

    // Listen for notifications from Pusher
    if (window.Echo) {
        window.Echo.channel("brt-notifications")
            .listen(".brt.notification", (event) => {
                // Add the notification to the list
                const newNotification = event.message;
                notifications.push(newNotification);

                // Hide "No new notifications" message if it exists
                if (noNotificationsItem) {
                    noNotificationsItem.remove();
                }

                // Add the new notification to the dropdown
                const listItem = document.createElement("li");
                listItem.className = "p-4 text-gray-800 hover:bg-gray-100 cursor-pointer";
                listItem.textContent = newNotification;
                notificationList.prepend(listItem);

                // Update notification count
                notificationCount.textContent = notifications.length;
                notificationCount.classList.remove("hidden");
            });
    }

    // Handle dropdown visibility on click outside
    document.addEventListener("click", (e) => {
        if (!notificationBell.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add("hidden");
        }
    });
});

document.getElementById('toggle-form').addEventListener('click', () => {
    const form = document.getElementById('create-brt-form');
    form.classList.toggle('hidden');
});


</script>