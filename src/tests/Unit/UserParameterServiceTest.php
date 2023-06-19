<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserParameterService;
use Illuminate\Support\Facades\Hash;
use Mockery;
use PHPUnit\Framework\TestCase;
use UserRepository;

class UserParameterServiceTest extends TestCase
{
    private $user;
    private $id = 123;

    protected function setUp(): void
    {
        $this->user = new User([
            'name' => 'John',
            'email' => 'john@example.com',
        ]);
    }

    public function test_get_user_name_exists(): void
    {
        // given
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn($this->user);

        $service = new UserParameterService($userRepositoryMock);
        // when
        $result = $service->getUserName($this->id);
        // then
        $this->assertEquals($result, 'John');
    }
    public function test_getUserName_does_not_exist(): void
    {
        // given
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn(null);

        $service = new UserParameterService($userRepositoryMock);
        // when
        $result = $service->getUserName($this->id);
        // then
        $this->assertEquals($result, null);
    }

    public function test_getUserEmail_exists(): void
    {
        // given
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn($this->user);

        $service = new UserParameterService($userRepositoryMock);
        // when
        $result = $service->getUserEmail($this->id);
        // then
        $this->assertEquals($result, 'john@example.com');
    }
    public function test_getUserEmail_does_not_exist(): void
    {
        // given
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn(null);

        $service = new UserParameterService($userRepositoryMock);
        // when
        $result = $service->getUserEmail($this->id);
        // then
        $this->assertEquals($result, null);
    }
}
