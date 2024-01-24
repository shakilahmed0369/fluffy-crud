<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Payment Withdraw Module</title>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Payment Withdraw Module</h1>

        <div class="card text-left">
          <div class="card-body">
            <h4 class="card-title">Withdraw form</h4>

            <form action="{{ route('payment-withdraw.store') }}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="">Withdraw Method</label>
                    <select name="withdraw_method_id" id="" class="form-control">
                        <option value="">Select</option>
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Withdraw Amount</label>
                    <input type="text" class="form-control" name="amount" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Account Info</label>
                    <textarea name="account_info" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>


                <button class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
          </div>
        </div>

        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th >{{ __('SN') }}</th>
                    <th >{{ __('Method') }}</th>
                    <th >{{ __('Charge') }}</th>
                    <th >{{ __('Total Amount') }}</th>
                    <th >{{ __('Withdraw Amount') }}</th>
                    <th >{{ __('Status') }}</th>
                  </tr>
            </thead>

            <tbody>
                @foreach ($withdraws as $index => $withdraw)
                                    <tr>
                                        <td>{{ ++$index }}</td>

                                        <td>{{ $withdraw->method }}</td>
                                        <td>
                                            {{ currency($withdraw->total_amount - $withdraw->withdraw_amount) }}
                                        </td>
                                        <td>
                                            {{ currency($withdraw->total_amount) }}
                                        </td>
                                        <td>
                                            {{ currency($withdraw->withdraw_amount) }}
                                        </td>
                                        <td>
                                            @if ($withdraw->status== 'approved')
                                                {{ __('Success') }}
                                            @elseif ($withdraw->status== 'rejected')
                                                {{ __('Rejected') }}
                                            @else
                                                {{ __('Pending') }}
                                            @endif
                                        </td>

                                    </tr>
                                  @endforeach
            </tbody>


        </table>



    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
