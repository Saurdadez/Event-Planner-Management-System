<!--

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'roleID',
        'lastName',
        'firstName',
        'middleName',
        'birthDate',
        'age',
        'address',
        'mobile_number',
        'email',
        'password',
        'profile_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthDate' => 'date',
    ];

    /**
     * Set a default value for the profile_pic attribute.
     *
     * @var array<string, string>
     */
    protected $attributes = [
        'profile_pic' => 'default_profile_pic.jpg',
    ];
} -->
