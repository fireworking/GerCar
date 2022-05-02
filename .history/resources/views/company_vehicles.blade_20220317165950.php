@extends('layouts.company_page')

@section('content')

  tr>
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $vehicles->find(1)->name }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->brand }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->plate }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->color }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->owner->name }}</td>
                </tr>
  
                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection