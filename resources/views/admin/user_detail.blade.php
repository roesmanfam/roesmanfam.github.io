@extends('main')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/user_detail.css') }}">
@endsection

@section('content')
    <!-- partial:index.partial.html -->
    {{-- @dd($user->nama) --}}
    <h1>
        Data Transfer {{ $user->nama }}
    </h1>
    <p><a href="/4dM1n">Back to home</a></p>
    <div class="container">
        <form action="/add_transfer" method="post">
            @csrf
            <input type="text" name="user_id" value="{{$user->id}}" hidden>
            <label for="" class="name">Jumlah Transfer</label>
            <input type="text" name="jumlah_transfer" id="jumlah_transfer">
            <div class="submit-container">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>
                        Tanggal
                    </th>
                    <th>
                        Jumlah Transfer
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $total_transfer = 0; ?>
                @foreach ($data_transfer as $data)
                <?php $uang = number_format($data->jumlah_transfer, 0, ",", "."); ?>
                    <tr>
                        <td>
                            {{ $data->created_at }}
                        </td>
                        <td>
                            Rp {{ $uang }}
                        </td>
                        <td>
                            <a class='button' href='/delete_data_transfer/{{ $data->id }}'>
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php 
                        $total_transfer += $data->jumlah_transfer;
                    ?>
                @endforeach
            </tbody>
            <tfoot>
                <?php $total = number_format($total_transfer, 0, ",", "."); ?>
                <tr>
                  <th colspan='3'>
                    Total Tabungan : Rp {{ $total }}
                  </th>
                </tr>
            </tfoot>
        </table>
    </main>
    <!-- partial -->
@endsection