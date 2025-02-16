<x-nofooter>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="{{ url('/admin/posts/' . $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title', $post->title)" required />

             <x-form.input name="slug" :value="old('slug', $post->slug)" required />
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
    
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>
            <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}}</x-form.textarea>

            <x-form.textarea name="body">{{old('excerpt', $post->body)}}</x-form.textarea>


            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error-message field="category" />
            </x-form.field>

            <x-submit-button type="submit">Update</x-submit-button>
        </form>
    </x-setting>
</x-nofooter>
