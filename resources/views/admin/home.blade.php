@extends('main')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <!-- partial:index.partial.html -->
    <h1>
        Tabungan Qurban Roesman Fam
    </h1>
    <div class="container">
        <form action="/add_user" method="post">
            @csrf
            <label for="" class="name">Add New Name</label>
            <input type="text" name="nama" id="name">
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
                        Fam Name
                    </th>
                    <th>
                        Total Tabungan
                    </th>
                    <th>
                        Edit Data Transfer
                    </th>
                    <th>
                        Delete User
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($users)
                    <?php $total_semua_tabungan = 0; ?>
                    @foreach ($users as $user)
                    <?php $total_tabungan = number_format($user->total_tabungan, 0, ",", "."); ?>
                        <tr>
                            <td>
                                {{ $user->nama }}
                            </td>
                            <td>
                                Rp {{ $total_tabungan }}
                            </td>
                            <td>
                                <a class='button' href='/4dM1n/user_detail/{{ $user->id }}'>
                                    View
                                </a>
                            </td>
                            <td>
                                <a class='button' href='/delete_user/{{ $user->id }}'>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php 
                            $total_semua_tabungan += $user->total_tabungan;
                        ?>
                    @endforeach
                @else
                    <tr>
                        <td>No Data</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <?php $total = number_format($total_semua_tabungan, 0, ",", "."); ?>
                <tr>
                  <th colspan='3'>
                    Total Semua Tabungan : Rp {{ $total }}
                  </th>
                </tr>
            </tfoot>
        </table>
          
    </main>
    <!-- partial -->
@endsection