<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductForm">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Update product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body m-1 ">
                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="form-group">
                        <label for="name">Product Name</label>

                        <input type="text" class="form-control" name="up_name" id="up_name" placeholder="product name">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>

                        <input type="number" class="form-control" name="up_price" id="up_price"
                               placeholder="product price">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
