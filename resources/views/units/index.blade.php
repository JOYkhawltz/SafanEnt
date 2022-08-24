@extends('layouts.app', ['page' => 'Units', 'pageSlug' => 'units', 'section' => 'units'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Units</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('units.create') }}" class="btn btn-sm btn-primary">Add Unit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Name</th>
                                <th>Email / Telephone</th>
                                <th>Balance</th>
                                <th>Purchases</th>
                                <th>Total Payment</th>
                                <th>Last purchase</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->name }}<br>{{ $unit->document_type }}-{{ $unit->document_id }}</td>
                                        <td>
                                            <a href="mailto:{{ $unit->email }}">{{ $unit->email }}</a>
                                            <br>
                                            {{ $unit->phone }}
                                        </td>
                                        <td>
                                            @if (round($unit->balance) > 0)
                                                <span class="text-success">{{ format_money($unit->balance) }}</span>
                                            @elseif (round($unit->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($unit->balance) }}</span>
                                            @else
                                                {{ format_money($unit->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $unit->sales->count() }}</td>
                                        <td>{{ format_money($unit->transactions->sum('amount')) }}</td>
                                        <td>{{ ($unit->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($unit->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('units.show', $unit) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('units.edit', $unit) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit unit">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('units.destroy', $unit) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete unit" onclick="confirm('Estás seguro que quieres eliminar a este unit? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
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
                        {{ $units->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
