<?php
include('header.php');
?>
            <!-- add Modal -->
            <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Add Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                       
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Price (KG)</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                       
                                    
                                </div>
                                <div class="mb-3">

                                    
                                    <label for="exampleInputPassword1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                     
                                </div>
                                <div class="mb-3">

                                    
                                    <label for="exampleInputPassword1" class="form-label">Total price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                     
                                </div>
                               
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- edit Modal -->
            <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                       
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Price (KG)</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                       
                                    
                                </div>
                                <div class="mb-3">

                                    
                                    <label for="exampleInputPassword1" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                     
                                </div>
                                <div class="mb-3">

                                    
                                    <label for="exampleInputPassword1" class="form-label">Total price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1">
                                     
                                </div>
                               
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete Modal -->
            <div class="modal fade " id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-3">Add Products</h4>
                            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add Products<i class="fa fa-plus ms-2"></i></button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                         <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                            
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                   <!-- <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-lg btn-lg-square btn-success "
                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button type="button" class="btn btn-lg btn-lg-square btn-danger "
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
<?php
            include('footer.php');
?>