<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TroubleArrayTest extends TestCase {

	const ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE = 'You didn\'t answer correctly the trouble-array exercise';

	/** @test */
	public function givenThePrintedResponse_shouldBeTheCorrectAnswerToCurrentExercise(): void {
		$answer = explode(' ', $this->getAnswer());
		$expectedAnswer = ['D'];

		$hadACorrectAnswer = array_diff($answer, $expectedAnswer) === array_diff($expectedAnswer, $answer);

		Assert::assertTrue($hadACorrectAnswer,self::ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE);
	}

	public function getAlternativesThatShouldNotBeAnswered(): array {
		return [
			'A' => ['A'],
			'B' => ['B'],
			'C' => ['C'],
		];
	}

	/**
	 * @test
	 * @dataProvider getAlternativesThatShouldNotBeAnswered
	 */
	public function givenThePrintedResponse_shouldNotAnswerAWrongAlternative(
		string $wrongAlternative
	): void {
		$answer = explode(' ', $this->getAnswer());

		$hadAWrongAnswer = in_array($wrongAlternative, $answer);

		Assert::assertFalse($hadAWrongAnswer, self::ERROR_MESSAGE_WITHOUT_CORRECT_ANSWERS_CLUE);
	}

	private function getAnswer(): string {
		return exec('php -f /opt/project/public/index.php');
	}
}
