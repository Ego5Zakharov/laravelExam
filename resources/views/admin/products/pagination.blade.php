<div class="table-data">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <th>{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href=""
                       class="btn btn-success update_product_form"
                       data-bs-toggle="modal"
                       data-bs-target="#updateModal"
                       data-id="{{$product->id}}"
                       data-name="{{$product->name}}"
                       data-price="{{$product->price}}"
                    >
                        <i class="las la-edit"></i>
                    </a>
                    <a href=""
                       class="btn btn-danger delete_product"
                       data-id="{{$product->id}}"
                    >
                        <i class="las la-times"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
</div>
