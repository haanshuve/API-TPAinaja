    <!-- ✅ Modal Tambah Peserta -->
    <div x-show="openAdd"
         x-cloak
         x-transition.opacity.duration.300ms
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
         @click.self="openAdd = false">

        <div class="bg-white rounded-xl shadow-lg p-6 w-[400px]">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Tambah Peserta</h2>

            <form action="{{ route('participants.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" @click="openAdd = false"
                        class="px-4 py-2 rounded-md border text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 rounded-md bg-[#6366F1] hover:bg-[#4F46E5] text-white font-semibold shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>