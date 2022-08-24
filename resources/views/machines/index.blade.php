@extends('layouts.app', ['page' => 'Machines', 'pageSlug' => 'machines', 'section' => 'machines'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Machines</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('machines.create') }}" class="btn btn-sm btn-primary">Add Machine</a>
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
                                @foreach ($machines as $machine)
                                    <tr>
                                        <td>{{ $machine->name }}<br>{{ $machine->document_type }}-{{ $machine->document_id }}</td>
                                        <td>
                                            <a href="mailto:{{ $machine->email }}">{{ $machine->email }}</a>
                                            <br>
                                            {{ $machine->phone }}
                                        </td>
                                        <td>
                                            @if (round($machine->balance) > 0)
                                                <span class="text-success">{{ format_money($machine->balance) }}</span>
                                            @elseif (round($machine->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($machine->balance) }}</span>
                                            @else
                                                {{ format_money($machine->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $machine->sales->count() }}</td>
                                        <td>{{ format_money($machine->transactions->sum('amount')) }}</td>
                                        <td>{{ ($machine->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($machine->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('machines.show', $machine) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('machines.edit', $machine) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit machine">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('machines.destroy', $machine) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete machine" onclick="confirm('Estás seguro que quieres eliminar a este machine? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
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
                        {{ $machines->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
