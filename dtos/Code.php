<?php
/**
 * 이 파일은 아이모듈 알림모듈의 일부입니다. (https://www.imodules.io)
 *
 * 알림종류 구조체를 정의한다.
 *
 * @file /modules/push/dtos/Code.php
 * @author Arzz <arzz@arzz.com>
 * @license MIT License
 * @modified 2024. 11. 5.
 */
namespace modules\push\dtos;
class Code
{
    /**
     * @var \Component $_component 알림을 보내는 컴포넌트객체
     */
    private \Component $_component;

    /**
     * @var string $_code 알림코드
     */
    private string $_code;

    /**
     * @var ?string $_title 알림명
     */
    private ?string $_title = null;

    /**
     * @var string[] $_channels 알림수신채널
     */
    private array $_channels = [];

    /**
     * 알림종류 구조체를 정의한다.
     *
     * @param \Component $component 알림을 보내는 컴포넌트객체
     * @param string $code 알림코드
     * @param string $title 알림명
     */
    public function __construct(\Component $component, string $code)
    {
        $this->_component = $component;
        $this->_code = $code;
    }

    /**
     * 알림코드를 가져온다.
     *
     * @param bool $is_component 컴포넌트종류 및 컴포넌트명을 포함한 코드를 가져올지 여부
     * @return string $code
     */
    public function getCode(bool $is_component = false): string
    {
        if ($is_component == true) {
            return $this->_component->getType() . '@' . $this->_component->getName() . '@' . $this->_code;
        }
        return $this->_code;
    }

    /**
     * 컴포넌트를 가져온다.
     *
     * @return \Component $component
     */
    public function getComponent(): \Component
    {
        return $this->_component;
    }

    /**
     * 알림명을 설정한다.
     *
     * @param string $title 알림명
     * @return  \modules\push\dtos\Code $this
     */
    public function setTitle(string $title): \modules\push\dtos\Code
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * 알림종류를 가져온다.
     *
     * @return ?string $title 알림명
     */
    public function getTitle(): ?string
    {
        return $this->_title;
    }

    /**
     * 설정가능한 수신채널을 설정한다.
     *
     * @param string[] $channels 수신가능채널 (WEB, SMS, EMAIL)
     * @return  \modules\push\dtos\Code $this
     */
    public function setChannels(array $channels): \modules\push\dtos\Code
    {
        $this->_channels = [];
        if (in_array('WEB', $channels) == true) {
            $this->_channels[] = 'WEB';
        }

        if (in_array('SMS', $channels) == true) {
            $this->_channels[] = 'SMS';
        }

        if (in_array('EMAIL', $channels) == true) {
            $this->_channels[] = 'EMAIL';
        }
        return $this;
    }

    /**
     * 설정가능한 수신채널을 가져온다.
     *
     * @return string[] $channels 수신채널
     */
    public function getChannels(): array
    {
        return $this->_channels;
    }
}
