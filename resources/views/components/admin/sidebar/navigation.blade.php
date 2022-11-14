 <ul class="p-2">
     <li> {{-- Dashboard --}}
         <x-admin.sidebar.single-link route="admin.dashboard" :text="__('admin.dashboard')">
             <x-admin.icons.chart-bar class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Rounds --}}
         <x-admin.sidebar.single-link route="admin.rounds" :text="__('admin.rounds')">
             <x-admin.icons.arrow-path class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Administrators --}}
         <x-admin.sidebar.single-link route="admin.administrators" :text="__('admin.administrators')">
             <x-admin.icons.users class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

 </ul>
