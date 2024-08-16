@extends('inventory.layout')
@section('title', 'Add Product')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Ajouter un produit</h5>
                            <span>Ajouter un nouveau produit en inventaire</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item">
                                <a href="#">Add Product</a>
                            </li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/inventory/products">
                            <input type="hidden" name="_token" value="R7Ddbbgxb1qEbQoTDakkow75fNl3gqY3q3qkjl94">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="title"> Titre <span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="title"
                                            value="" placeholder="Enter product title" required="">
                                        <div class="help-block with-errors"></div>


                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control html-editor h-205" rows="10"></textarea>

                                    </div>
                                    {{--
                                    <div class="form-group">
                                        <label>Images du produit</label>
                                        <div class="input-images" data-input-name="product-images"
                                            data-label="Faites glisser et déposez les images des produits ici ou cliquez pour parcourir">
                                        </div>
                                    </div> --}}

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        {{-- Au cas ou, l'entreprise à differents site d'entreprot, il va falloir énumérer et selectionner chaque entreprot --}}
                                        {{-- <label>Entrepôt</label>
                                        <select class="form-control" name="warehouse">
                                            <option selected="selected" value="">Select Warehouse</option>
                                            <option value="1">Warehouse 1</option>
                                            <option value="2">Warehouse 2</option>
                                        </select> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="sku">SKU<span class="text-red">*</span></label>
                                        <input id="sku" type="text" class="form-control" name="sku"
                                            value="" placeholder="Entrez la clé du produit" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Prix<span class="text-red">*</span></label>
                                        <input id="price" type="text" class="form-control" name="price"
                                            value="" placeholder="Entrez le prix du produit" required="">
                                        <div class="help-block with-errors"></div>


                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_price">Prix ​​d'achat<span class="text-red">*</span></label>
                                        <input id="purchase_price" type="text" class="form-control" name="purchase_price"
                                            value="" placeholder="Entrez le prix du produit" required="">
                                        <div class="help-block with-errors"></div>


                                    </div>
                                    <div class="form-group">
                                        <label for="offer_price">Prix ​​de vente</label>
                                        <input id="offer_price" type="text" class="form-control" name="offer_price"
                                            value="" placeholder="Entrez le prix de vente" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Qté<span class="text-red">*</span></label>
                                        <input id="qty" type="text" class="form-control" name="qty"
                                            value="" placeholder="Entrez Qté du produit " required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="stock_alert">Alerte boursière <span class="text-red">*</span></label>
                                        <input id="stock_alert" type="text" class="form-control" name="stock_alert"
                                            value="" placeholder="Enter Stock Alert" required="">
                                        <div class="help-block with-errors"></div>
                                    </div> --}}


                                </div>
                                <div class="col-sm-3">

                                    <div class="form-group">

                                        <label>Sélectionnez les catégories</label>
                                        <div class="border-checkbox-section ml-3">
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox1"
                                                    value="1">
                                                <label class="border-checkbox-label" for="checkbox1">Sel</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox2"
                                                    value="2">
                                                <label class="border-checkbox-label" for="checkbox2">Plafons</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox3"
                                                    value="3">
                                                <label class="border-checkbox-label" for="checkbox3">Peintures </label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox4"
                                                    value="4">
                                                <label class="border-checkbox-label" for="checkbox4">Ciment &amp;
                                                    Constrcution</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox5"
                                                    value="5">
                                                <label class="border-checkbox-label" for="checkbox5">Fashion</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox6"
                                                    value="6">
                                                <label class="border-checkbox-label" for="checkbox6">Baby</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox7"
                                                    value="7">
                                                <label class="border-checkbox-label" for="checkbox7">Health &amp;
                                                    Care</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox8"
                                                    value="8">
                                                <label class="border-checkbox-label" for="checkbox8">Toiles</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkbox9"
                                                    value="9">
                                                <label class="border-checkbox-label" for="checkbox9">Divers</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label></label>
                                        <div class="border-checkbox-section ml-3">
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" id="checkboxfree"
                                                    value="free">
                                                <label class="border-checkbox-label" for="checkboxfree">Free
                                                    Shipping</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="tax_type">Tax Type<span class="text-red">*</span></label>
                                        <select name="tax_type" class="form-control">
                                            <option>Select</option>
                                            <option value="Inclusive">Inclusive</option>
                                            <option value="Exclusive">Exclusive</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="input">Product Tag</label>
                                        <input type="text" id="tags" class="form-control h-100" value="">
                                    </div> --}}

                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
