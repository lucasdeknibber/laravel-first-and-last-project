<!-- Edit Category Form -->
<form method="post" action="{{ route('faq.category.update', $category->id) }}">
    @csrf
    @method('put')
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}" required>
    <button type="submit">Update Category</button>
</form>
