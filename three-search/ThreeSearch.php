<?php
namespace Ailgor\ThreeSearch;

abstract class ThreeSearch
{
	public function search($problem)
	{
		$frontier = array();
		$frontier[] = $problem->getInitialState();

		return $this->recursiveSearch($problem, $fontier);
	}

	private function recursiveSearch($problem, $fontier)
	{
		if (empty($frontier)) {
			return null;
		} else {
			$path = $this->removeChoice($frontier);
			$state = $path->getEnd();
			if ($problem->isGoal($state)) {
				return $path;
			} else {
				$actions = $problem->getAvailableActionsFromState($state);

				for ($actions as $action) {
					$next = $problem->getNextState($state, $action);
					$frontier[] = $next;
				}

				return $this->recursiveSearch($problem, $frontier);
			}
		}
	}

	protected abstract function removeChoice($frontier)
	{

	}
}
