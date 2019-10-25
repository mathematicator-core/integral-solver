<?php

declare(strict_types=1);

namespace Mathematicator\Integral;


use Mathematicator\Engine\MathematicatorException;
use Mathematicator\Engine\QueryNormalizer;
use Mathematicator\Integral\Rule\Rule;
use Mathematicator\Tokenizer\Token\IToken;
use Mathematicator\Tokenizer\Tokenizer;
use Nette\Tokenizer\Exception;

class IntegralSolver
{

	/**
	 * @var Rule[]
	 */
	public $rules = [];

	/**
	 * @var Tokenizer
	 */
	private $tokenizer;

	/**
	 * @var QueryNormalizer
	 */
	private $queryNormalizer;

	/**
	 * @param Tokenizer $tokenizer
	 * @param QueryNormalizer $queryNormalizer
	 */
	public function __construct(Tokenizer $tokenizer, QueryNormalizer $queryNormalizer)
	{
		$this->tokenizer = $tokenizer;
		$this->queryNormalizer = $queryNormalizer;
	}

	/**
	 * @param string $query
	 * @return string
	 * @throws MathematicatorException|Exception
	 */
	public function process(string $query): string
	{
		$tokens = $this->tokenizer->tokensToObject(
			$this->tokenizer->tokenize(
				$this->queryNormalizer->normalize($query)
			)
		);

		return $this->processByTokens($tokens);
	}

	/**
	 * @param IToken[] $tokens
	 * @return string
	 */
	public function processByTokens(array $tokens): string
	{
		bdump($tokens);

		return '';
	}

	/**
	 * @param Rule $rule
	 * @return IntegralSolver
	 */
	public function addRule(Rule $rule): self
	{
		$this->rules[] = $rule;

		return $this;
	}

}