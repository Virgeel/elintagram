namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    /**
     * Return a collection of posts.
     */
    public function collection()
    {
        return Post::all();  // Export all posts
    }

    /**
     * Define the headings for the Excel sheet.
     */
    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Caption',
            'Photo',
            'Created At',
            'Updated At',
        ];
    }
}
