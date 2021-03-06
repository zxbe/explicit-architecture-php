<?php

declare(strict_types=1);

/*
 * This file is part of the Explicit Architecture POC,
 * which is created on top of the Symfony Demo application.
 *
 * (c) Herberto Graça <herberto.graca@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Acme\PhpExtension\Test;

/**
 * @small
 *
 * @internal
 */
final class ConstructableFromArrayTraitUnitTest extends AbstractUnitTest
{
    /**
     * @test
     *
     * @throws \ReflectionException
     */
    public function from_array(): void
    {
        $value = 123;

        $dto = DummyConstructableFromArray::fromArray(['prop1' => $value, 'inexistent' => 'foo']);

        self::assertInstanceOf(DummyConstructableFromArray::class, $dto);
        self::assertSame($value, $dto->getProp1());
        self::assertSame(0, $dto->getProp2());
    }

    /**
     * @test
     *
     * @throws \ReflectionException
     */
    public function from_array_Throws_exception_if_argument_is_missing(): void
    {
        $this->expectException(\Exception::class);

        $value = 123;

        $dto = DummyConstructableFromArray::fromArray(['inexistent' => 'foo']);

        self::assertInstanceOf(DummyConstructableFromArray::class, $dto);
        self::assertSame($value, $dto->getProp1());
    }
}
