<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>POS | Radmin - Laravel Admin Starter</title>
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')
</head>
@php
    $products = config('mockdata.products');
    shuffle($products);
@endphp

<body id="app">
    <div class="wrapper">
        <div class="pos-container p-3 pt-0">
            <div class="row">
                <div class="col-sm-1 bg-white h-100vh ">
                    <div class="pos top-menu mt-20 text-center">
                        {{-- <a href="{{ url('/inventory') }}" class="nav-link m-auto mb-10"><i
                                class="ik ik-arrow-left-circle"></i></a>
                        <a href="#" class="nav-link m-auto mb-10" id="apps_modal_btn" data-toggle="modal"
                            data-target="#appsModal"><i class="ik ik-grid"></i></a> --}}
                        <a class="nav-link m-auto mb-10 mt-50" href="#" id="notiDropdown"><i
                                class="ik ik-file"></i></a>
                        <a class="nav-link m-auto mb-10" href="{{ url('profile') }}"><i class="ik ik-user"></i></a>
                        <a class="nav-link m-auto mb-10" href="{{ url('logout') }}">
                            <i class="ik ik-power"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 bg-white">
                    <div class="customer-area">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="warehouse">
                                        <option selected="selected" value="">Selectionner une catégorie</option>
                                        <option value="1">Riz</option>
                                        <option value="2">Ciment </option>
                                        <option value="2">Tols</option>
                                        <option value="2">Peinture</option>
                                        <option value="2">Pointes</option>
                                        <option value="2">Divers</option>
                                        <option value="2">Huile</option>
                                        <option value="2">Plafon</option>
                                        <option value="2">Sel</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="product" class="form-control"
                                        placeholder="Rechercher un produit">
                                </div>
                            </div>

                        </div>

                        <div class="row pos-products layout-wrap" id="layout-wrap">

                            <!-- include product preview page -->
                            @foreach (array_slice($products, 0, 8) as $key => $product)
                                <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-2 list-item list-item-grid p-2">
                                    <div class="card mb-1 pos-product-card"
                                        data-info="{{ htmlentities(json_encode($product)) }}">
                                        <div class="d-flex card-img">
                                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}"
                                                class="list-thumbnail responsive border-0">
                                        </div>
                                        <div class="p-2">
                                            <p>{{ $product['name'] }} <small
                                                    class="text-muted">{{ $product['category_name'] }}</small> </p>
                                            @if ($product['offer_price'])
                                                <span class="product-price"><span
                                                        class="price-symbol">$</span>{{ $product['offer_price'] }}</span>
                                                <small
                                                    class="text-red font-15"><s>{{ $product['regular_price'] }}</s></small>
                                            @else
                                                <span class="product-price"><span
                                                        class="price-symbol">$</span>{{ $product['regular_price'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 bg-white product-cart-area">
                    <div class="product-selection-area">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Détails de la commande</h6>
                                <i class="text-danger ik ik-refresh-ccw cursor-pointer font-15"
                                    onclick="cleartCart()"></i>
                        </div>
                        <hr>
                        <div id="product-cart" class="product-cart mb-3">
                            <!-- Uncomment to preview original cart html
       ====================================================
       <div class="d-flex justify-content-between position-relative">
        <i class="text-red ik ik-x-circle cart-remove cursor-pointer" onclick="removeCartItem(ID)"></i>
        <div class="cart-image-holder">
         <img src="IMAGE_SRC">
        </div>
        <div class="w-100 p-2">
         <h5 class="mb-2 cart-item-title">ITEM_NAME</h5>
         <div class="d-flex justify-content-between">
          <span class="text-muted">QUANTITYx</span>
          <span class="text-success font-weight-bold cart-item-price">SUBTOTAL</span>
         </div>
        </div>
       </div> -->
                        </div>
                        <div class="box-shadow p-3">
                            <div class="d-flex justify-content-between font-15 align-items-center">
                                <span>Total </span>
                                <strong id="subtotal-products">0.00</strong>
                            </div>
                            <div class="d-flex justify-content-between font-15 align-items-center">
                                <span>Rémise</span>
                                <input class="form-control w-90 font-15 text-right" id="discount">
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between font-20 align-items-center">
                                <b>Total à payer</b>
                                <b id="total-bill">0.00</b>
                            </div>
                        </div>
                        <div class="box-shadow p-3 mb-3">
                            <label class="d-block">Informations client</label>
                            <div class="d-block">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nom du client" value="YEO KANIGUI">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Numéro de téléphone" value="0505507478">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" name="name" class="form-control h-82px" placeholder="Lieu d'habitation"
                                        value="Korhogo, nouveau quartier"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-shadow p-3">
                            <button class="btn btn-danger btn-checkout btn-pos-checkout " data-toggle="modal"
                                data-target="#InvoiceModal">PASSER LA COMMANDE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- initiate modal menu section-->
    @include('include.modalmenu')

    <!-- Preview Invoice Modal -->
    <div class="modal fade edit-layout-modal pr-0 " id="InvoiceModal" role="dialog"
        aria-labelledby="InvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog mw-70" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="InvoiceModalLabel">Aperçu de la facture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="card-header" style="text-align: center">
                        <h2 class="d-block w-100">Facture<small class="float-right">07/10/2024</small></h2>
                    </div>
                    <div class="card-body">
                        @include('common.invoice')
                        <div class="row no-print">
                            <div class="col-12">
                                {{-- <button type="button" class="btn btn-success pull-right">
                                    <i class="fa fa-credit-card"></i> Submit Payment
                                </button> --}}
                                <button type="button" class="btn btn-primary pull-right"><i
                                        class="fa fa-download"></i> Imprimer la facture</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- initiate scripts-->
    <script src="{{ asset('all.js') }}"></script>
    <script src="{{ asset('dist/js/theme.js') }}"></script>
    <script>
        const parser = new DOMParser();

        function decodeString(inputStr) {
            return parser.parseFromString(`<!doctype html><body>${inputStr}`, 'text/html').body.textContent
        }

        var cart = {};
        $(document).on('click', '.pos-product-card', function() {
            var product = JSON.parse(decodeString($(this).data('info')));
            var price = product.offer_price ? product.offer_price : product.regular_price;
            var id = product.id;

            if (cart.hasOwnProperty(id)) {
                cart[id].quantity++;
                cart[id].subtotal = price * cart[id].quantity;
            } else {
                cart[id] = {
                    name: product.name,
                    image: product.image,
                    price: price,
                    quantity: 1,
                    subtotal: price
                };
            }
            // Update cart table
            updateCartTable();
        });

        $(document).on('keyup', '#discount', function() {
            updateCartTable();
        });

        function removeCartItem(id) {
            delete cart[id];
            updateCartTable();
        }

        function cleartCart() {
            if (confirm('Are you sure to clear cart?')) {
                cart = {};
                $('#discount').val(0)
                updateCartTable();
            }
        }

        // Function to update the cart table
        function updateCartTable() {
            var $cartTable = $('#product-cart'),
                $cartTotal = $('#subtotal-products'),
                $totalText = $('#total-bill');

            var cartTotal = 0,
                discount = $('#discount').val();

            // Table de chariot vide
            $cartTable.empty();

            // Parcourez les articles du panier et ajoutez-les au tableau du panier
            for (var id in cart) {
                if (cart.hasOwnProperty(id)) {
                    var item = cart[id];
                    var $tr = `<div class="d-flex justify-content-between position-relative">
								<i class="text-red ik ik-x-circle cart-remove cursor-pointer" onclick="removeCartItem(${id})"></i>
								<div class="cart-image-holder">
									<img src="${item.image}">
								</div>
								<div class="w-100 p-2">
									<h5 class="mb-2 cart-item-title">${item.name}</h5>
									<div class="d-flex justify-content-between">
										<span class="text-muted">${item.quantity}x</span>
										<span class="text-success font-weight-bold cart-item-price">${item.subtotal.toFixed(2)}</span>
									</div>
								</div>
							</div>`;
                    $cartTable.append($tr);
                    cartTotal += item.subtotal;
                }
            }

            //Mettre à jour le total du panier
            $cartTotal.text(cartTotal.toFixed(2));
            $totalText.text((cartTotal - discount).toFixed(2));
        }
    </script>
</body>

</html>
