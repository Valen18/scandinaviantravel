<div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 overflow-y-auto bg-white bg-opacity-30 p-8 rounded-lg" style="max-height: 600px;">
            @if($instance->images->count() > 0)
                @foreach($instance->images as $image)
                    <div class="relative rounded overflow-hidden">
                        <div class="relative rounded-lg aspect-ratio-16/9">
                            <img src="/storage/{{ $image->url }}" alt="Imagen" class="w-full h-full object-cover rounded-lg" />
                            <div class="absolute top-4 right-4 flex items-center space-x-1 cursor-pointer">
                                <div class="w-8 h-8 flex items-center justify-center bg-gray-300 hover:bg-gray-600 rounded-full">
                                    <div class="w-3 h-3 flex items-center justify-center bg-gray-300 rounded-full transition duration-300 transform-gpu hover:bg-blue-600 hover:text-white hover:scale-105">
                                        <i class="fas fa-heart text-gray-500 text-xl @if($image->isFavorite) text-red-500 @endif hover:text-white"
                                            onclick="toggleFavorite({{ $image->id }})"
                                            id="fav-{{ $image->id }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-white bg-opacity-40 backdrop-blur-md rounded-b-lg p-2 flex justify-center space-x-4">
                            <button onclick="openModal({{ $image }})" class="bg-white border text-gray-800 border-gray-300 rounded px-4 py-2">Manage</button>
                            <button onclick="confirmDelete({{ $image->id }})" class="bg-red-500 text-white rounded px-4 py-2">Delete</button>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 class="w-full text-center">No images yet</h2>
            @endif
        </div>
    
        <div class="flex mt-5">
            <div>
                <input type="file" id="imageInput" wire:model="imageToUpload" style="display: none;" accept="image/*" @change="updateFileName($event)">
                <input
                    type="text"
                    readonly
                    wire:model="imageName"
                    class="border rounded-lg p-2 mt-2 cursor-pointer mr-3 text-gray-800"
                    placeholder="Text"
                    onclick="document.getElementById('imageInput').click();"
                    id="fileName"
                >
                
                    <button wire:click="uploadImage" class="bg-blue-500 text-white py-2 px-4 mr-3 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out mt-2">
                        Upload
                    </button>
               
            </div>
            <div class="text-red-600 py-3 mt-2 text-sm">
                @error('imageToUpload')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <!-- Modal -->
        <div id="imageModal" class="fixed inset-0 flex justify-center items-center z-50 hidden">
            <div class="fixed inset-0 bg-gray-700 bg-opacity-50 backdrop-blur-md"></div>
            <div class="bg-white  bg-opacity-80 w-96 p-6 rounded-lg relative">
                <!-- Botón para cerrar el modal -->
                <button id="modalCloseButton" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Image: <span id="modalTitle">Image id</span></h2>
                <div class="mb-4">
                    <label for="imageNameInput" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" wire:model="modalName" id="imageNameInput" class="border rounded-lg p-2 w-full text-gray-800" wire:model="modalName">
                </div>
                <div class="mb-4">
                    <label for="imageAltInput" class="block text-gray-700 text-sm font-bold mb-2">Alt:</label>
                    <input type="text" wire:model="modalAlt" id="imageAltInput" class="border rounded-lg p-2 w-full text-gray-800" wire:model="modalAlt">
                </div>
                <div class="flex">
                    <button id="modalSaveButton" class="bg-blue-500 text-white py-2 px-8 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out uppercase">Save</button>
                    
                    <div class="text-red-600 text-sm ml-4" id="modalError">
                        @error('modalName') {{ $message }} @enderror
                        @error('modalAlt') {{ $message }} @enderror
                    </div>
                </div>
            </div>
        </div>
        <script>     
            function toggleFavorite(imageId) {
                const heartIcon = document.getElementById(`fav-${imageId}`);
                const isFavorite = heartIcon.classList.contains('text-red-500');

                if (isFavorite) {
                    heartIcon.classList.remove('text-blue-500');
                } else {
                    heartIcon.classList.add('text-blue-500');
                }
            }

            function updateFileName(event) {
                const fileInput = event.target;
                const fileNameDisplay = document.querySelector('#imageInput');
               
                if (fileInput.files.length > 0) {
                    fileNameDisplay.textContent = fileInput.files[0].name;
                    // Quito la extensión antes de ponerlo en el textfield
                    document.getElementById('fileName').value = fileNameDisplay.textContent.slice(0, -4);
                    @this.set('imageName', document.getElementById('fileName').value);
                    
                } else {
                    fileNameDisplay.textContent = '';
                }
            }

            function openModal(data){
                document.getElementById('imageModal').classList.remove('hidden');
                modalTitle.textContent = data.id;
                document.getElementById('imageNameInput').value = data.name;
                document.getElementById('imageAltInput').value =  data.alt;

            }

            function closeModal() {
                document.getElementById('imageModal').classList.add('hidden');
            }

            document.getElementById('modalSaveButton').addEventListener('click', () => {
                const modal = document.getElementById('imageModal');
                const imageName = document.getElementById('imageNameInput').value;
                const imageAlt = document.getElementById('imageAltInput').value;

                if (!imageName || !imageAlt) {
                    const modalError = document.getElementById('modalError');
                    modalError.textContent = 'Por favor, complete todos los campos.';
                    return; 
                }
                
                @this.set('modalId', modalTitle.textContent);
                @this.set('modalAlt', imageAlt);
                @this.set('modalName', imageName);
                @this.call('saveImageInfo');

                closeModal();
            });

            function confirmDelete(imageId) {
                const confirmDelete = confirm("¿Are you sure you want to delete this image?");
                
                if (confirmDelete) {
                    // Si el usuario confirma, llama a Livewire para eliminar la imagen
                    @this.call('deleteImage', imageId);
                }
            }

            document.addEventListener('cleanText', () => {
                document.getElementById('fileName').value = '';
            });
        </script>
</div>
