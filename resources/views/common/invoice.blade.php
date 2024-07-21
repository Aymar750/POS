<div class="row invoice-info">
    <div class="col-sm-12">
        <h4 class="text-right">FactNum : 24895SZ</h4>
    </div>
    <div class="col-sm-3  invoice-col">
        Caissier
        <address>
            <strong>YEO</strong><br>KANIGUI <br>Korhogo <br>Nméro: (225) 050-550 7478<br>Email: kaniguiyeo0550@gmail.com
        </address>
    </div>
    <div class="col-sm-3 invoice-col">
        Entreprise
        <address>
            <strong>Pegaf Business </strong><br>Cocody, Lycée Dominique<br>Korhogo<br>Numéro: (+225)
            0748949418<br>Email: pegaff@gmail.com
        </address>
    </div>
    <div class="col-sm-3 invoice-col text-right">
        <b>Date d'émission :</b>15 Juin 2024<br>
        <b>Date d'échéance :</b>20 Juillet 2024<br>
        <b>Compte :</b> 20 Juillet 2024
    </div>
    <div class="col-sm-3 invoice-col text-right">
        <img height="100" src="{{ asset('img/qr.png') }}" alt="">
    </div>
</div>

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="wp-10">N°</th>
                    <th class="wp-40">Produit</th>
                    <th class="wp-20">Prix Unitaire</th>
                    <th class="wp-15">Qnté</th>
                    <th class="wp-15">Rémise</th>
                    <th class="wp-15 text-right">Sous Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $invoiceItems = config('mockdata.invoice_items');
                    $grandTotal = 0;
                    $grandDiscount = 0;

                @endphp
                @foreach ($invoiceItems as $key => $product)
                    @php

                        $subtotal = $product['qty'] * ($product['unit_price'] - $product['discount']);
                        $grandTotal += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['unit_price'] }}</td>
                        <td>{{ $product['qty'] }}</td>
                        <td>{{ number_format($product['discount'], 2, '.', '') }}</td>
                        <td class="text-right">{{ number_format($subtotal, 2, '.', '') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-6">
        {{-- <p class="lead">Payment Methods:</p>
        <img src="{{ asset('/img/credit/visa.png') }}" alt="Visa">
        <img src="{{ asset('/img/credit/mastercard.png') }}" alt="Mastercard">
        <img src="{{ asset('/img/credit/american-express.png') }}" alt="American Express">
        <img src="{{ asset('/img/credit/paypal2.png') }}" alt="Paypal">

        <div class="alert alert-secondary mt-20">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
        </div> --}}
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <div class="table-responsive">
            @php
                $taxAmount = $grandTotal * 0.1;
                $grandTotalWithTax = $grandTotal + $taxAmount;

            @endphp
            <table class="table">
                <tbody>
                    <tr>
                        <th class="th-50">Soustotal:</th>
                        <td class="text-right">{{ number_format($grandTotal, 2, '.', '') }}</td>
                    </tr>
                    <tr>
                        <th>Tasse :(10%)</th>
                        <td class="text-right">{{ number_format($taxAmount, 2, '.', '') }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td class="text-right">{{ number_format($grandTotalWithTax, 2, '.', '') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
