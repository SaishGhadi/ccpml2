<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[#0C8A6F] dark:text-[#0C8A6F] leading-tight text-center">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center justify-center bg-gray-50 dark:bg-black text-black/50 dark:text-white/50">
        <div class="w-full max-w-4xl px-6">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-lg rounded-2xl p-8">
                <h2 class="font-bold text-2xl text-[#0C8A6F] dark:text-[#0C8A6F] leading-tight text-center mb-6">
                    Admin Settings / Input Form
                </h2>

                <form method="POST" action="{{ route('admin.submit') }}" class="space-y-4">
                    @csrf

                    <!-- Input 1 -->
                    <input type="text" name="admin_name" required placeholder="Admin Name"
                        class="w-full p-3 border rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white" />

                    <!-- Input 2 -->
                    <input type="email" name="admin_email" required placeholder="Admin Email"
                        class="w-full p-3 border rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white" />

                    <!-- Input 3 -->
                    <input type="password" name="admin_password" required placeholder="Password"
                        class="w-full p-3 border rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white" />

                    <!-- Role -->
                    <select name="role" required class="w-full p-3 border rounded bg-gray-100 dark:bg-zinc-700 text-black dark:text-white">
                        <option value="">Select Role</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="editor">Editor</option>
                        <option value="moderator">Moderator</option>
                    </select>

                    <!-- Submit -->
                    <div class="text-center">
                        <button type="submit"
                            class="w-1/2 bg-[#0C8A6F] text-white p-3 rounded hover:bg-[#0C8A6F]/80 transition">
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
