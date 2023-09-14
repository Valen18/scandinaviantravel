<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class ImageGallery extends Component
{
    use WithFileUploads;
    public $instance;
    public $imageName;
    public $imageToUpload;
    public $modalId;
    public $modalName;
    public $modalAlt;

    public function mount($instance)
    {
       $this->instance = $instance;
    }

    public function render()
    {
        return view('livewire.image-gallery');
    }


    public function saveImageInfo() {     
        
        $image = Image::findOrFail($this->modalId);
        $image->name = $this->modalName;
        $image->alt = $this->modalAlt;
        $image->save();

    }
    
    public function deleteImage($imageId)
    {
        $image = Image::findOrFail($imageId);

        if ($image) {      
            try {
                Storage::disk('public')->delete($image->url);
            } catch (\Exception $e) {
                dd(\Log::error('Error al eliminar el archivo: ' . $e->getMessage()));
            }  
            $image->delete();
            $this->render();
        }
    }

    public function uploadImage()
    {
        $this->validate([
            'imageToUpload' => [
                'required',
                'image',
                'max:2048000', // Tamaño máximo de 2048 MB en kilobytes (2048 * 1024)
            ],
        ], [
            'imageToUpload.required' => 'Please select an image.',
            'imageToUpload.image' => 'The selected file is not a valid image.',
            'imageToUpload.dimensions' => 'The image dimensions must not exceed 2048x2048 px.',
            'imageToUpload.max' => 'Image too big. The maximum size is 2048 MB. Please try with another image.',
        ]);
    
        if ($this->imageToUpload) {
            $imagePath = $this->imageToUpload->store('images', 'public');
    
            $this->instance->images()->create([
                'url' => $imagePath,
                'name' => $this->imageName,
                'alt' => $this->imageName,
            ]);

            $this->dispatch('cleanText');
            $this->instance = $this->instance->fresh();
        }
        
    }

}
