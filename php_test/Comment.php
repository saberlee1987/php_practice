<?php

class Comment
{

    private string $text;
    private string $author;

    public function __construct(string $text = "", string $author = "")
    {
        $this->text = $text;
        $this->author = $author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PRIVATE);
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($this);
        }

        return $data;

//        return [
//            'text' => $this->getText(),
//            'author' => $this->getAuthor()
//        ];
    }


    public function __toString(): string
    {
        try {
            return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR
                | JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            var_dump($e);
            return "{}";
        }
    }

}