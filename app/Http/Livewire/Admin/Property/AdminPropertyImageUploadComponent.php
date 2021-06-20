<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use App\Models\PropertyImage;
use App\Models\Property;


class AdminPropertyImageUploadComponent extends Component
{
	protected $listeners = ['refreshImages' => '$refresh'];
	use WithFileUploads;
	public $property;
	public $showButton = true;
	public $photos = [];
	// public $captions = [];
	public $PropertyImages = [];

	public $imageUploadStatus;


	public function mount($property_id = null)
    {
        $this->property = Property::find($property_id);
        foreach ($this->property->images as $key => $value) {
            $PropertyImages[$value->id]['caption'] = $value->caption;
        }
        // $this->PropertyImages = (array)$this->property->images;
        $this->showButton = false;
        $this->imageUploadStatus = '';
        // dd($this->property->images[10]->media->getUrl('thumb'));

    }
    // public function updatedPropertyImages(){
    // 	foreach ($this->PropertyImages as $PropertyImageKey => $PropertyImage) {
    //         $propertyimagecaption = $PropertyImage['caption'];
    //         // $PropertyImage->save();
    //         $PropertyImage = PropertyImage::find($PropertyImageKey);
    //         // dd($PropertyImage['caption']);
    //         $PropertyImage->caption = $propertyimagecaption;
    //         $PropertyImage->save();
    //         // dd($PropertyImage);
    //     }
    //     // dd($this->PropertyImages);
    // }

    public function updateCaption($property_image_id, $value)
    {
        $PropertyImage = PropertyImage::find($property_image_id);
        $PropertyImage->caption = $value;
        $PropertyImage->save();
        $this->emit('refreshImages');
       
    }


	public function updatedPhotos()
    {
    	$this->imageUploadStatus = 'Validating...';
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        $this->imageUploadStatus = 'Uploading...';

        foreach ($this->photos as $key => $photo) {
        	// dd($photo);
            
             // $image = [
             //        'name' => $photo->getClientOriginalName(),
             //        'path' => $photo->getRealPath(),
             //    ];
        	
        		$imageName = 'obs-'.$this->property->id.'-'.$this->property->location->slug.'-'.$this->property->state->slug.'-'.$this->property->category->slug.'-OffBeat-Stays-'.md5(time()).$key.'.'.$photo->getClientOriginalExtension();
                // dd($photo->getRealPath());
	            // $PropertyImage = '/storage/' .$photo->storeAs('uploads/properties/original', $imageName, 'public');
                $PropertyImage = $this->property->addMedia($photo->getRealPath())->usingFileName($imageName)->toMediaCollection('property')->id;
	            // array_push($this->PropertyImages, $PropertyImage);

	            /*$imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).$key.'.'.$photo->getClientOriginalExtension();
	            $PropertyImage = '/storage/' .$photo->storeAs('uploads/properties/original', $imageName, 'public');
	            // array_push($this->PropertyImages, $PropertyImage);*/

	            // saving filename in database
	            PropertyImage::create([
				    'name' => $PropertyImage,
				    'property_id' => $this->property->id,
				]);

	            /*$img = Image::make(public_path($PropertyImage));


	   			$watermark = Image::make(public_path('front-assets/images/logo.png'));

			     insert watermark at bottom-right corner with 10px offset 

			    $img->insert($watermark, 'bottom-right', 10, 10);
			    $img->save($img->dirname.'/watermarked/'.$img->basename);*/
			    unset($this->photos[$key]);
			    $this->emit('refreshImages');
	        	

            
		    
		    
        }
        // $this->photos = [];


    }

    public function removePhotoFromSelection($photos_key='')
    {
    	unset($this->photos[$photos_key]);
    	$this->photos = array_values($this->photos);
    	// dd($this->photos);
    	$this->emit('refreshImages');
    	$this->updatedPhotos();

    	
    }
    
    public function deletPropertyImage($property_image_id='', $property_id='')
    {
    	$this->showButton = false;
    	PropertyImage::find($property_image_id)->delete();
    	$this->property = Property::find($property_id);
    	$this->emit('refreshImages');
    }

   


    public function save()
    {        
        $this->emit('refreshImages');
    }

    public function render()
    {

        return view('livewire.admin.property.admin-property-image-upload-component');
    }
}
