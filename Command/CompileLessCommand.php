<?php declare (strict_types=1);

namespace Tvswe\LessBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompileLessCommand extends Command
{
    /** @var string */
    private $lessPath;
    
    /** @var string */
    private $cssPath;

    public function __construct(string $lessPath, string $cssPath)
    {
        $this->lessPath = $lessPath;
        $this->cssPath = $cssPath;

        parent::__construct();
    }
    
    protected function configure()
    {
        $this->setName('tvswe:compile-less')
             ->setDescription('Compiles less into css.')
             ->setHelp('This command compiles /templates/_private/less/style.less to /public/css/style.css');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {        
        $options = array( 'compress'=>true );
        $parser = new \Less_Parser( $options );
        $parser->parseFile($this->lessPath);
        
        $css = $parser->getCss();
        
        file_put_contents($this->cssPath, $css);
    }
}