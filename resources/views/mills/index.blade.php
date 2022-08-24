@extends('layouts.app', ['page' => 'Mills', 'pageSlug' => 'mills', 'section' => 'mills'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Mills</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('mills.create') }}" class="btn btn-sm btn-primary">Add Mill</a>
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
                                @foreach ($mills as $mill)
                                    <tr>
                                        <td>{{ $mill->name }}<br>{{ $mill->document_type }}-{{ $mill->document_id }}</td>
                                        <td>
                                            <a href="mailto:{{ $mill->email }}">{{ $mill->email }}</a>
                                            <br>
                                            {{ $mill->phone }}
                                        </td>
                                        <td>
                                            @if (round($mill->balance) > 0)
                                                <span class="text-success">{{ format_money($mill->balance) }}</span>
                                            @elseif (round($mill->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($mill->balance) }}</span>
                                            @else
                                                {{ format_money($mill->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $mill->sales->count() }}</td>
                                        <td>{{ format_money($mill->transactions->sum('amount')) }}</td>
                                        <td>{{ ($mill->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($mill->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('mills.show', $mill) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('mills.edit', $mill) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit mill">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('mills.destroy', $mill) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete mill" onclick="confirm('Estás seguro que quieres eliminar a este mill? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
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
                        {{ $mills->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
