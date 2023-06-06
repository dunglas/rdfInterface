<?php

/*
 * The MIT License
 *
 * Copyright 2021 zozlak.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace rdfInterface;

/**
 * Immutable edge processing methods
 *
 * @author zozlak
 */
interface DatasetMapReduceInterface extends DatasetInterface {

    /**
     * 
     * @param callable $fn function applied to every quad with signature `fn(quad, dataset)`
     * @param QuadCompareInterface|QuadIteratorInterface|QuadIteratorAggregateInterface|callable|null $filter
     * @return DatasetMapReduceInterface
     */
    public function map(callable $fn,
                        QuadCompareInterface | QuadIteratorInterface | QuadIteratorAggregateInterface | callable | null $filter = null): DatasetMapReduceInterface;

    /**
     * @param callable $fn aggregate function with signature `fn(accumulator, quad, dataset)`
     *   applied on each quad and returns last callback result
     * @param mixed $initialValue
     * @param QuadCompareInterface|QuadIteratorInterface|QuadIteratorAggregateInterface|callable|null $filter
     * @return mixed
     */
    public function reduce(callable $fn, $initialValue = null,
                           QuadCompareInterface | QuadIteratorInterface | QuadIteratorAggregateInterface | callable | null $filter = null): mixed;
}
