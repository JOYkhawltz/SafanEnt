@extends('layouts.app', ['page' => 'Sectors', 'pageSlug' => 'sectors', 'section' => 'sectors'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Sectors</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sectors.create') }}" class="btn btn-sm btn-primary">Add Sector</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Name</th>
                                <!-- <th>Email / Telephone</th>
                                <th>Balance</th>
                                <th>Purchases</th>
                                <th>Total Payment</th>
                                <th>Last purchase</th> -->
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($sectors as $sector)
                                    <tr>
                                        <td>{{ $sector->sector_name }}</td>
                                        {{--<td>
                                            <a href="mailto:{{ $sector->email }}">{{ $sector->email }}</a>
                                            <br>
                                            {{ $sector->phone }}
                                        </td>
                                        <td>
                                            @if (round($sector->balance) > 0)
                                                <span class="text-success">{{ format_money($sector->balance) }}</span>
                                            @elseif (round($sector->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($sector->balance) }}</span>
                                            @else
                                                {{ format_money($sector->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $sector->sales->count() }}</td>
                                        <td>{{ format_money($sector->transactions->sum('amount')) }}</td>
                                        <td>{{ ($sector->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($sector->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>--}}
                                        <td class="td-actions text-right">
                                            <a href="{{ route('sectors.show', $sector) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('sectors.edit', $sector) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit sector">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('sectors.destroy', $sector) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete sector" onclick="confirm('Estás seguro que quieres eliminar a este sector? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $sectors->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
