<div class="p-10">
    @if (session()->has('message'))
        <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('message') }}</p>
        </div>
        @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
           <tr>
              <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 Customer Name
              </th>
              <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 {{$ticket->customer_name}}
              </th>
           </tr>
        </thead>
        <tbody class="bg-white">
            <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Customer Phone
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   {{$ticket->phone}}
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Customer Email
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   {{$ticket->email}}
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Problem Description
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   {{$ticket->problem_description}}
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Replies
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    @foreach ($ticket->messages as $message)
                    <table>
                        <tr>
                            <td scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$message->created_at}}
                            </td>
                            <td scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$message->message}}
                            </td>
                        </tr>
                    </table>


                   @endforeach
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Status
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="relative">
                        <select wire:model="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                          <option value="">Select Option</option>
                          <option>pending</option>
                          <option>answered</option>
                          <option>closed</option>
                        </select>
                        @error('status') <span class="text-red-700">*{{ $message }}</span> @enderror
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                      </div>
                    </div>
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                   Message
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <textarea wire:model="message"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-zip"></textarea>
                                @error('message') <span class="text-red-700">*{{ $message }}</span> @enderror
                </th>
             </tr>
             <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <button type="submit" wire:click.prevent="save"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
                </th>
             </tr>

        </tbody>
     </table>
</div>
