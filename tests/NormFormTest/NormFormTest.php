<?php
namespace NormFormTest;
/**
 * Class for testing NormFormDemo with PHPUnit
 * If this class is called in a commandline with phpunit, all methods starting with test* are called in the given order
 * Use startNormFormTest.sh to do so
 */
use NormFormSkeleton\NormFormDemo;
use Fhooe\NormForm\Parameter\PostParameter;
use Fhooe\NormForm\Parameter\GenericParameter;
use Fhooe\NormForm\View\View;

class NormFormTest extends \PHPUnit\Framework\TestCase
{
    private $normform;
    private $view;

    /**
     * setUp() is run before each test and initializes the View and NormFormDemo object
     */
    public function setUp()
    {
        $this->view = new View(
            "normFormDemo.html.twig",
            "../../templates",
            "../../templates_c",
            [
                new PostParameter(NormFormDemo::FIRST_NAME),
                new PostParameter(NormFormDemo::LAST_NAME),
                new PostParameter(NormFormDemo::MESSAGE),
            ]
        );
        $this->normform = new NormFormDemo($this->view);
    }

    /**
     * This method is run after each test to free memory. Could be left empty to make PHP handle this.
     */
    public function tearDown()
    {
        unset($this->normform);
    }

    /**
     * Test if the Page is not empty: The template should be displayed in the expected way.
     * Test if a form with input fields named firstname, lastname and message exists.
     */
    public function testGetPage()
    {
        $_SERVER["REQUEST_METHOD"] = "GET";
        $page=$this->runNormForm();
        self::AssertNotEmpty($page);
        self::AssertRegexp("/form/", $page);
        self::AssertRegexp("/firstname/", $page);
        self::AssertRegexp("/lastname/", $page);
        self::AssertRegexp("/message/", $page);
    }

    /**
     * Test case: Form is sent without any data given
     */
    public function testAllFieldsAreEmpty()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST=[NormFormDemo::FIRST_NAME => "", NormFormDemo::LAST_NAME => "", NormFormDemo::MESSAGE => ""];
        $this->runNormForm();
        $params = $this->view->getParameters();
        foreach ($params as $param) {
            if ($param instanceof PostParameter) {
                // Each input field has to be empty after page is returned
                self::assertEmpty($param->getValue());
            } else {
                if ($param->getName() === "errorMessages") {
                    // There are two required fields, that need a errorMessage associated
                    self::assertCount(2,$param->getValue());
                    self::assertArrayHasKey('firstname',$param->getValue());
                    self::assertArrayHasKey('lastname',$param->getValue());
                }
            }
        }
    }

    /**
     * Test case: Form is sent without no first name given
     */
    public function testFirstNameIsEmpty()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST=[NormFormDemo::FIRST_NAME => "", NormFormDemo::LAST_NAME => "NotEmpty", NormFormDemo::MESSAGE => "NotEmpty"];
        $this->runNormForm();
        $params = $this->view->getParameters();
        foreach ($params as $param) {
            if ($param instanceof PostParameter) {
                if ($param->getName() === NormFormDemo::FIRST_NAME) {
                    self::assertEmpty($param->getValue());
                } else {
                    self::assertNotEmpty($param->getValue());
                }
            } else {
                if ($param instanceof GenericParameter) {
                    self::assertCount(1,$param->getValue());
                    self::assertArrayHasKey('firstname',$param->getValue());
                }
            }
        }
    }

    /**
     * Test case: Form is sent with only first name given
     */
    public function testLastNameIsEmpty()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST=[NormFormDemo::FIRST_NAME => "NotEmpty", NormFormDemo::LAST_NAME => "", NormFormDemo::MESSAGE => ""];
        $this->runNormForm();
        $params = $this->view->getParameters();
        foreach ($params as $param) {
            if ($param instanceof PostParameter) {
                if ($param->getName() === NormFormDemo::FIRST_NAME) {
                    self::assertNotEmpty($param->getValue());
                } else {
                    self::assertEmpty($param->getValue());
                }
            } else {
                if ($param instanceof GenericParameter) {
                    self::assertCount(1,$param->getValue());
                    self::assertArrayHasKey('lastname',$param->getValue());
                }
            }
        }
    }

    /**
     * Test case: Form is sent with all fields given. The result should be displayed
     */
    public function testAllFieldsAreFilled()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST=[NormFormDemo::FIRST_NAME => "NotEmpty", NormFormDemo::LAST_NAME => "NotEmpty", NormFormDemo::MESSAGE => "NotEmpty"];
        $this->runNormForm();
        $params = $this->view->getParameters();
        foreach ($params as $param) {
            if ($param instanceof PostParameter) {
                    self::assertNotEmpty($param->getName());
            } else {
                if ($param instanceof GenericParameter) {
                    if ($param->getName() === "errorMessages") {
                        self::assertEmpty($param->getValue());
                    }
                    if ($param->getName() === "statusMessage") {
                        self::assertNotEmpty($param->getValue());
                    }
                    if ($param->getName() === "result") {
                        self::assertCount(3, $param->getValue());
                    }
                }
            }
        }
    }

    public function runNormForm()
    {
        /**
         * Capture the HTML output and do not send to terminal, but return to calling function.
         */
        ob_start();
        $this->normform->normform();
        $ret= ob_get_contents();
        ob_end_clean();
        return $ret;
    }
}