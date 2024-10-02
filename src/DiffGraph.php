<?php

namespace Kfriars\DiffGraph;

use Illuminate\Console\OutputStyle;

/**
 * @property array<int, array<int, string>> $graph
 * @property array<int, string> $from
 * @property array<int, string> $to
 */
class DiffGraph
{
    /** Corner Character */
    const C = '+';

    /** Horizontal Line Character */
    const H = '-';

    /** Vertical Line Character */
    const V = '|';

    /** Diagonal Line Character */
    const D = '╲';

    /** Blank Space Character */
    const B = ' ';

    protected array $graph = [];

    protected array $from;

    protected array $to;

    protected int $width;

    protected int $height;

    /**
     * @param  array<int, array<int, string>>  $graph
     */
    public function __construct(
        string $from,
        string $to,
        protected OutputStyle $output,
    ) {
        $this->from = mb_str_split($from);
        $this->to = mb_str_split($to);

        $this->width = count($this->from);
        $this->height = count($this->to);

        $xAxes = mb_str_split(implode(self::H, array_fill(0, $this->width + 1, self::C)));

        for ($i = 0; $i < $this->height; $i++) {
            $this->graph[] = $xAxes;

            $line = '';

            for ($j = 0; $j < $this->width; $j++) {
                $line .= '|'.($this->to[$i] === $this->from[$j] ? self::D : self::B);
            }

            $line .= '|';

            $this->graph[] = mb_str_split($line);
        }

        $this->graph[] = $xAxes;
    }

    public function render(): void
    {
        $lines = array_map(fn ($line) => implode('', $line), $this->graph);

        foreach ($this->withAxes($lines) as $line) {
            $this->output->writeln($line);
        }
    }

    protected function withAxes(array $lines)
    {
        // Add the side Axes Information
        foreach ($this->to as $i => $char) {
            $lineNum = $i * 2;
            $lines[$lineNum] = ' '.$lines[$lineNum].'-'.$i;
            $lines[$lineNum + 1] = $char.$lines[$lineNum + 1].'  ';
        }

        $lines[$lineNum + 2] = ' '.$lines[$lineNum + 2].'-'.($i + 1);

        // Add the top Axis Information
        array_unshift($lines, '  '.implode(' ', $this->from).' ');

        // Add the bottom Axis Information
        $x = array_keys($this->from);
        $x[] = $this->width;
        $lines[] = ' '.implode(' ', $x);

        return $lines;
    }
}
