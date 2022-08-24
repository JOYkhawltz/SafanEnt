@extends('layouts.app', ['page' => 'Companies', 'pageSlug' => 'companies', 'section' => 'companies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Companies</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary">Add Company</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>In Sector</th>
                                <th>Company</th>
                                <th>Owner</th>
                                <th>Designation</th>
                                <th>GST</th>
                                <th>No. of Units</th>
                                <th>Contact Details</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->sector_id }}</td>
                                        <td>{{ $company->company_name }}</td>
                                        <td>{{ $company->owner }}</td>
                                        <td>{{ $company->designation }}</td>
                                        <td>{{ $company->GST }}</td>
                                        <td>{{ $company->number_of_units }}</td>
                                        <td><br>{{ $company->address }}
                                        <br>{{ $company->NTN }}
                                        <br>{{ $company->email_id }}
                                        <br>{{ $company->mobile }}
                                        <br>{{ $company->PTCL }}
                                        <br>{{ $company->ext }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('companies.show', $company) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit company">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('companies.destroy', $company) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete company" onclick="confirm('Estás seguro que quieres eliminar a este company? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
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
                        {{ $companies->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
