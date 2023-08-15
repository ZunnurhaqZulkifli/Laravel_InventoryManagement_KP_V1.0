  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
  </head>

  <body>
      <div class="container">
          <div class="display-2 fw-bold">Sales<a class="fw-light text-decoration-none text-dark">_{{ $sale->id }}</a>
          </div>

          <div class="card">
              <div class="p-2">

                  <a
                      class="text-decoration-none text-dark">{{ $sale->id }}_{{ $sale->created_at->format('d/m/Y H:i') }}</a>
                  <br>
                  <a href="{{ route('sales.user', [$userId]) }}" class="">Sold By : Seller
                      ID_{{ $userId }}</a>

                  <br>
                  <a>Items Sold</a>
                  <br>
                  (@foreach ($items as $item)
                      <a>{{ $item }}</a>
                  @endforeach

                  @foreach ($quantities as $quantity)
                      X<a>{{ $quantity }}</a>
                  @endforeach

                  @foreach ($productItems as $pi)
                      <a href="{{ route('products.show', [$pi]) }}">Product_{{ $pi }}</a>
                  @endforeach)

                  <br>
                  <hr>

                  <div class="card">
                      <div class="p-1 justify-content-center mx-auto">
                          <a>TOTAL = RM{{ $sale->totalSales }}</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </body>

  </html>
