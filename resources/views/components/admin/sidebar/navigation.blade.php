 <ul class="p-2">
     <li> {{-- Dashboard --}}
         <x-admin.sidebar.single-link route="admin.dashboard" :text="__('admin.dashboard')">
             <x-admin.icons.chart-bar class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Stockholders --}}
         <x-admin.sidebar.single-link route="admin.stockholders" :text="__('Stockholders')">
             <x-admin.icons.users class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Properties --}}
         <x-admin.sidebar.single-link route="admin.properties" :text="__('admin.properties')">
             <x-admin.icons.house-modern class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Rounds --}}
         <x-admin.sidebar.single-link route="admin.rounds" :text="__('admin.rounds')">
             <x-admin.icons.arrow-path class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Wishes --}}
         <x-admin.sidebar.single-link route="admin.wishes" :text="__('Wishes')">
             <x-admin.icons.star class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Administrators --}}
         <x-admin.sidebar.single-link route="admin.administrators" :text="__('admin.administrators')">
             <x-admin.icons.users class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>

     <li> {{-- Logs --}}
         <x-admin.sidebar.single-link route="admin.logs" :text="__('Logs')">
             <x-admin.icons.list-bullet class="h-5 w-5" />
         </x-admin.sidebar.single-link>
     </li>
 </ul>
