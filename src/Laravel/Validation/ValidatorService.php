<?php

namespace Wavvel\CommonPhp\Laravel\Validation;

use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\ValidationException;
use RuntimeException;

/**
 * Centralized style validation that holds validation rules.
 * This way it's easier to make changes to the whole validation logic.
 * Instead of having them scattered.
 */
class ValidatorService {
  private array $validationRulesByScenario = [];
  private ValidatorFactory $validator;

  public function __construct(ValidatorFactory $validator) {
    $this->validator = $validator;
  }

  public function validate(string $scenario, array $input, array $customErrorMessages = []): void {
    if (!isset($this->validationRulesByScenario[$scenario])) {
      throw new RuntimeException(sprintf(
        'Scenario %s is not registered, available scenarios: %s',
        $scenario,
        json_encode($this->validationRulesByScenario, JSON_PRETTY_PRINT)
      ));
    }

    $validationRules = $this->validationRulesByScenario[$scenario];
    $validationResult = $this->validator->make($input, $validationRules, $customErrorMessages);

    if ($validationResult->fails()) {
      throw new ValidationException($validationResult);
    }
  }

  public function addScenario(string $scenario, array $validationRules): void {
    $this->validationRulesByScenario[$scenario] = $validationRules;
  }

  public function extendScenarioAs(
    string $scenario,
    string $asScenario,
    array $validationRules
  ): void {
    $this->validationRulesByScenario[$asScenario] = array_merge(
      $this->validationRulesByScenario[$scenario],
      $validationRules
    );
  }

  public function getValidationRulesByScenario(string $scenario): array {
    return $this->validationRulesByScenario[$scenario];
  }
}

