<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Ticket;
use Orion\Http\Controllers\Controller;

class TicketsController extends Controller
{
    protected $model = Ticket::class;
}
