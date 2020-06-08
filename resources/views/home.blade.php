<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('search') }}">
        @csrf
        <input name="search" type="text" placeholder="tap to find ressource">
        <button type="submit">Find</button>
    </form>

  <div class="flex" style="display: flex">
    <table border="1">
        <tr>
            <th>Category name</th>
            <th>Category description</th>
            <th>Category slug</th>
        </tr>
         @foreach ($category as $item)
                 <tr>
                     <td>{{ $item->title }}</td>
                     <td>{{ $item->description }}</td>
                     <td>{{ $item->slug }}</td>
                     <td>
                         <form method="post" action="{{ route('delete') }}">
                             @csrf
                             <input type="hidden" name="category_id" value="{{ $item->_id }}">
                             <button type="submit">Delete</button>
                         </form>
                     </td>
                 </tr>
         @endforeach
     </table>
    <table border="1">
        <tr>
            <th>Product name</th>
            <th>Product description</th>
            <th>Product slug</th>
            <th>Product Category</th>
            <th>Product status</th>
        </tr>
         @foreach ($product as $item)
                 <tr>
                     <td>{{ $item->title }}</td>
                     <td>{{ $item->description }}</td>
                     <td>{{ $item->slug }}</td>
                     <td >{{ $item->category->title ?? '' }}</td>
                     <td>{{ $item->status }}</td>
                     <td>
                         <form method="post" action="{{ route('delete_product') }}">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $item->_id }}">
                             <button type="submit">Delete</button>
                         </form>
                     </td>
                 </tr>
         @endforeach
     </table>
  </div>
<div>
    <h2>My filter</h2>
    <form method="GET" action="{{ route('home') }}">
        <input type="text" name="title">
        <select name="category_id" id="">
            @forelse ($category as $item)
                <option value="{{ $item->_id }}">{{ $item->title }}</option>
            @empty

            @endforelse
        </select>
        <label for="">Is active</label>
        <input type="radio" name="status" value="0">
        <input type="radio" name="status" value="1">
        <button type="submit">Apply</button>
    </form>
</div>

   <div>
    <h2>Add new category</h2>
    <form method="post" action="{{ route('create') }}">
         @csrf
         <input name="title" type="text" placeholder="title">
         <input name="description" type="text" placeholder="description">
         <input name="slug" type="text" placeholder="slug">
         <button type="submit">Create</button>
     </form>

    <h2>Add new Product</h2>
    <form method="post" action="{{ route('create_product') }}">
         @csrf
         <input name="title" type="text" placeholder="title">
         <input name="description" type="text" placeholder="description">
         <input name="slug" type="text" placeholder="slug">
         <input name="status" type="number" placeholder="status" min="0" max="1">
         <select name="category_id" id="">
             @forelse ($category as $item)
             <option value="{{ $item->_id }}"> {{ $item->title }}</option>
             @empty

             @endforelse
         </select>
         <button type="submit">Create</button>
     </form></div>
</body>
</html>

