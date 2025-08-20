@extends('admin.layout')
@section('content')
<div class="container mt-5  ">
    <input type="number" name="jumlah_tagihan" id="jumlah_tagihan" class="form-control"><br>
    <a href="" class="btn btn-sm btn-primary w-25">Bayar</a>
    <h5 class="mt-5">Payment Detail</h5>
    <hr>
    <form action="{{ route('admin.paymentDetail', ['id' => Crypt::encrypt($member->users_id)]) }}" method="POST">
                    <th>No</th>
                    <th>Name</th>
                    <th>Period</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payment as $item)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->period }}</td>
                <td class="text-success">Rp.{{ $item->duesCategory->nominal }}</td>
                <td>{{ $item->created_at }}</td>
                <td>>
                   <a href="{{ route('admin.paymentDelete', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dues member {{ $item->user->nama }} ini dihapus?')">Delete</a>
              </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </form>
</div>
@endsection

