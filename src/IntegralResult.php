<?php

declare(strict_types=1);

namespace Mathematicator\Integral;


use Mathematicator\Engine\Step\Step;
use Mathematicator\Tokenizer\Token\IToken;

final class IntegralResult
{

	/** @var IToken[] */
	private array $queryTokens;

	private string $queryLaTeX;

	private ?string $result = null;

	private string $differential;

	private bool $singleToken;

	/** @var Step[] */
	private array $steps = [];


	/**
	 * @param IToken[] $queryTokens
	 */
	public function __construct(array $queryTokens, string $queryLaTeX, string $differential, bool $singleToken)
	{
		$this->queryTokens = $queryTokens;
		$this->queryLaTeX = $queryLaTeX;
		$this->differential = $differential;
		$this->singleToken = $singleToken;
	}


	public function isFinalResult(): bool
	{
		return str_contains($this->getResult(), '?') === false;
	}


	public function getResult(): string
	{
		return $this->result ?? '';
	}


	/**
	 * @internal
	 */
	public function setResult(string $result): void
	{
		$this->result = $result;
	}


	public function getDifferential(): string
	{
		return $this->differential;
	}


	public function isSingleToken(): bool
	{
		return $this->singleToken;
	}


	/**
	 * @return IToken[]
	 */
	public function getQueryTokens(): array
	{
		return $this->queryTokens;
	}


	public function getQueryLaTeX(): string
	{
		return '\int '
			. ($this->isSingleToken() ? $this->queryLaTeX : '\left(' . $this->queryLaTeX . '\right)')
			. ' \ d' . $this->getDifferential();
	}


	/**
	 * @return Step[]
	 */
	public function getSteps(): array
	{
		return $this->steps;
	}


	public function addStep(Step $step): self
	{
		$this->steps[] = $step;

		return $this;
	}
}
