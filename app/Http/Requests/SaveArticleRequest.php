<?php namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SaveArticleRequest extends Request
{
	protected $all = null;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rule = [
			'title' => 'required|max:255',
			'section_id' => 'exists:sections,id'
		];

		if (!$this->get('id')) {
			$rule['metadata.uri'] = 'required|unique:metadata';
		}

		for ($i = 1; $i <= count($this->get('paragraphs', [])); $i++) {
			$rule['paragraphs.' . $i . '.image.file'] = 'mimes:jpeg,png';
		}

		return $rule;
	}

	public function all()
	{
		if (!$this->all) {
			$all = parent::all();

			if (!$this->get('id')) {
				if (!$this->get('metadata.uri')) {
					array_set($all, 'metadata.uri',
						Carbon::create()->format('Y/m/d') . '/' . Str::slug($this->get('title')));
				}

				$all['published_at'] = Carbon::create();
			}

			for ($i = 1; $i <= count($this->get('paragraphs', [])); $i++) {
				if ($this->hasFile('paragraphs.' . $i . '.image.file')) {
					if ($this->has('paragraphs.' . $i . '.image.uri')) {
						array_set(
							$all,
							'paragraphs.' . $i . '.image.uri_old',
							array_get($all, 'paragraphs.' . $i . '.image.uri')
						);
					}

					$tempnam = tempnam(
						public_path('img/articles'),
						$i
					);

					$imgFilename = str_replace(public_path('img/articles') . '/', '', $tempnam);
					array_set(
						$all,
						'paragraphs.' . $i . '.image.uri',
						$imgFilename . '.' . $this->file('paragraphs.' . $i . '.image.file')->getClientOriginalExtension()
					);

					File::delete($tempnam);
				}
			}

			$this->all = $all;
		}

		return $this->all;
	}

	public function updateImages()
	{
		for ($i = 1; $i <= count($this->get('paragraphs', [])); $i++) {
			if ($this->hasFile('paragraphs.' . $i . '.image.file')) {
				$this->file('paragraphs.' . $i . '.image.file')->move(
					public_path('img/articles'), array_get($this->all, 'paragraphs.' . $i . '.image.uri')
				);
			}

			if (array_get($this->all, 'paragraphs.' . $i . '.image.uri_old')) {
				File::delete(public_path('img/articles') . '/' . array_get($this->all, 'paragraphs.' . $i . '.image.uri_old'));
			}
		}
	}
}
