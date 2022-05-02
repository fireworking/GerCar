<template>
    <div class="px-4 sm:px-6 lg:px-16">
        <div :class="'pb-4 sm:flex sm:items-center'">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold text-gray-900 pt-10">Vehicles</h1>
            </div>
        </div>
    <div class="flex items-center mt-4">
        <input id="all" v-model="filter" value="all" name="notification-method" type="radio" checked class="focus:ring-orange-500 h-4 w-4 text-orange-600 border-gray-300">
        <label for="all" class="ml-3 block text-sm font-medium text-gray-700"> All </label>
        <input id="mine" v-model="filter" value="mine" name="notification-method" type="radio" class="focus:ring-orange-500 h-4 ml-4 w-4 text-orange-600 border-gray-300">
        <label for="mine" class="ml-3 block text-sm font-medium text-gray-700"> Mine </label>
    </div>
    <div class="mt-4">
      <styled-label field='plate'>Search By License Plate</styled-label>
      <div class="mt-1">
          <input v-model="plate" id="plate" name="plate" type="text" autocomplete="plate"
            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-xs sm:text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                  <th scope="col" class="px-2 sm:px-3 py-3.5 text-left text-xs sm:text-sm font-semibold text-gray-900">Brand</th>
                  <th scope="col" class="px-2 sm:px-3 py-3.5 text-left text-xs sm:text-sm font-semibold text-gray-900">License Plate</th>
                  <th scope="col" class="px-2 sm:px-3 py-3.5 text-left text-xs sm:text-sm font-semibold text-gray-900">
                    <select v-model="color" class="mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                      <option value="" selected>All Colors</option>
                      <option v-for="(color, index) in uniqueColors" :key="index" :value="color">{{ color }}</option>
                    </select>
                  </th>
                  <th scope="col" class="px-2 sm:px-3 py-3.5 text-left text-xs sm:text-sm font-semibold text-gray-900">Owner</th>
                  <th scope="col" class="px-2 sm:px-3 py-3.5 text-left text-xs sm:text-sm font-semibold text-gray-900">Company</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="(vehicle, index) in updatedVehicles" :key="index">
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-xs sm:text-sm font-medium text-gray-900 sm:pl-6">{{ vehicle.name }}</td>
                  <td class="whitespace-nowrap px-2 sm:px-3 py-4 text-xs sm:text-sm text-gray-500">{{ vehicle.brand }}</td>
                  <td class="whitespace-nowrap px-2 sm:px-3 py-4 text-xs sm:text-sm text-gray-500">{{ vehicle.plate }}</td>
                  <td class="whitespace-nowrap px-2 sm:px-3 py-4 text-xs sm:text-sm text-gray-500">{{ vehicle.color }}</td>
                  <td class="whitespace-nowrap px-2 sm:px-3 py-4 text-xs sm:text-sm text-gray-500">{{ updatedOwners[index].name }}</td>
                  <td class="whitespace-nowrap px-2 sm:px-3 py-4 text-xs sm:text-sm text-gray-500">{{ updatedCompanies[index].name }}</td>
                </tr>
              </tbody>
            </table>
            <div v-if="empty" class="h-40 grid place-items-center text-gray-500">
              <h2>Couldn't find any vehicle</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: [ 'vehicles', 'owners', 'companies', 'mine' ],
    data() {
        return {
            filter: 'all',
            plate: '',
            color: ''
        }
    },
    watch: {
      plate(newPlate, oldPlate) {
        let vPlate = this.plate;
        vPlate = vPlate.replace(/\w/g, e => e[0].toUpperCase());
        vPlate = vPlate.replace(/[A-Z]{4}/g, e => e.substring(0, 3) + '-');
        vPlate = vPlate.replace(/[0-9]{5}/g, e => e.substring(0, 4));
        vPlate = vPlate.replace(/[A-Z][0-9]/g, e => e[0] + '-' + e[1]);
        vPlate = vPlate.replace(/[0-9-][A-Z-]/g, e => e[0]);
        vPlate = vPlate.replace(/^-/g, e => '');
        vPlate = vPlate.replace(/[^\w-]/g, e => '');
        this.plate = vPlate;
      }
    },
    computed:{
      updatedVehicles(){
        let v = this.filter == 'all' ? this.vehicles : this.mine;
        if(color != '')
        return v.filter(e => e.plate.match(new RegExp(this.plate + '.*')));
      },
      updatedOwners(){
        let i = 0;
        let v = [];
        this.updatedVehicles.forEach((e) => {
          while(this.owners[i].id != e.owner_id){
            i++;
          }
          v.push(this.owners[i]);
        });
        return v;
      },
      updatedCompanies(){
        let i = 0;
        let v = [];
        this.updatedVehicles.forEach((e) => {
          while(this.companies[i].id != e.company_id){
            i++;
          }
          v.push(this.companies[i]);
        });
        return v;
      },
      empty(){
        return this.updatedVehicles.length == 0;
      },
      uniqueColors(){
        let colors = this.vehicles.map(e => e.color);
        return colors.filter((value, index, self) => self.indexOf(value) == index);
      }
    }
}
</script>