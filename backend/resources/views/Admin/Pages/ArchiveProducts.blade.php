<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Products</title>
    <link rel="stylesheet" href="{{asset('css/archive-products.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <a href="{{route('products')}}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to products
        </a>

        @if(session('success'))
        <script>
            alert('{{session("success")}}')
        </script>
        @endif

        <div class="table-responsive">
            <table class="table table-hover" id="productTable">
                <thead class="table-light">
                    <tr>
                        <th>Item Code</th>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($archive_products) > 0)
                    @foreach($archive_products as $archive)
                    <tr>
                        <td>{{ $archive->Itemcode }}</td>
                        <td>
                            <img src="{{asset('/images/' . $archive->Image) }}" alt="{{$archive->Item_Name}}" class="product-img">
                        </td>
                        <td>{{ $archive->Item_Name }}</td>
                        <td>{{ $archive->Category }}</td>
                        <td>₱{{ number_format($archive->Unit_Price, 2) }}</td>
                        <td>{{ $archive->Quantity }}</td>
                        <td>{{ $archive->Description }}</td>
                        <td class="action-buttons">
                            <form action="{{route('restore.item' , $archive->Itemcode)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-archive"></i> Restore
                                </button>
                            </form>
                            <form action="{{route('delete.item', $archive->Itemcode)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">No products available</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>