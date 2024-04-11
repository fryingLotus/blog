@props(['heading'])

<section class="py-8 max-w-6xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="grid grid-cols-4 gap-8">
        <aside class="col-span-1">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                {{-- <li>
                    <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">Dashboard</a>
                </li> --}}

                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
            </ul>
        </aside>

        <main class="col-span-3">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>