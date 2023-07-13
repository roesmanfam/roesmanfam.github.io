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
    <p><a href="/">Back to home</a></p>
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